<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satellite;
use App\Transponder;
use App\Channel;
use DB;
use Illuminate\Support\Collection;

class ImportXmlController extends Controller
{
	public $satelliteInsertId;
	
	public function index()
	{
		return view('xml.show');
	}

	public function store(Request $request)
	{

	   if($request->hasFile('satellites') && $request->hasFile('channels')) {

			$fileSatellite = $request->file('satellites');
			$sat_xml = new \SimpleXMLElement($fileSatellite->getRealPath(), null, true);

			$fileChannels = $request->file('channels');
			$ch_xml = new \SimpleXMLElement($fileChannels->getRealPath(), null, true);

			$satelliteArray = [];
			$transponderArray = [];
			$channelArray = [];
			$tmpArray = [];
			$sat_key = 1;
			$tp_key = 1;

			foreach ($sat_xml->children() as $satellite) {
				
				if($satellite['longitude'] == 0) continue;
				$satelliteArray[$sat_key] = [
					'name' => $satellite['name'],
					'longitude' => $satellite['longitude'],
				];

				foreach ($satellite->children() as $transponder) {
					
					$tmpArray[$tp_key] = [
						'old_sat_key' => $transponder['sat_key']->__toString(),
						'old_tp_key' => $transponder['tp_key']->__toString(),
						'tp_key' => $tp_key,
						'satellite_id' => $sat_key
					];
					
					$tp_system = ($transponder['modulation_mode'] == 'QPSK') ? 'DVB-S' : 'DVB-S2';
					$transponderArray[$tp_key] = [
						'satellite_id' => $sat_key,
						'tp_system' => $tp_system,
						'modulation' => $transponder['modulation_mode'],
						'frequency' => $transponder['frequency'],
						'symbrate' => $transponder['symbol_rate'],
						'polarization' => $transponder['polarization'],
						'fec' => $transponder['fec']
					];
					$tp_key++;		
				}
				$sat_key++;
			}
		
			foreach ($ch_xml->children() as $programs) {
				foreach ($tmpArray as $tp) {
					if ($programs['sat_key'] == $tp['old_sat_key'] &&
						$programs['tp_key'] == $tp['old_tp_key']) {
						
						$channelArray[] = [
							'enabled' => 1,
							'satellite_id' => $tp['satellite_id'],
							'transponder_id' => $tp['tp_key'],
							'name' => $programs['name'],
							'hdsd' => $programs['hd'],
							'video_type' => $programs['video_type'],
							'sid' => $programs['service_id'],
							'vpid' => $programs['video_pid'],
							'pcrpid' => $programs['pcr_pid'],
							'pmtpid' => $programs['pmt_pid'],
							'apid' => $programs['audio_pid'],
							'language' => $programs['audio_lang']
						];
					}
				}
			}

			DB::statement("SET foreign_key_checks=0");
			Satellite::truncate();
			Transponder::truncate();
			Channel::truncate();
			DB::statement("SET foreign_key_checks=1");
	
			Satellite::insert($satelliteArray);
			Transponder::insert($transponderArray);
			Channel::insert($channelArray);
		}
	}
}
