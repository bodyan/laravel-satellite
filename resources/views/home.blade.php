@extends('layouts.app')

@section('content')
        <div class="container-fluid">
      <div class="row hidden-sm-down">
        <div class="col-3">
          Назва
        </div>
        <div class="col-sm-1">
          Тип
        </div>
        <div class="col-2">
          Sid
        </div>
        <div class="col">
          Формат
        </div>
        <div class="col-1">
          Мова
        </div>
        <div class="col">
          Кодування
        </div>
        <div class="col-sm-1 hidden-md-down">
          Екран 
        </div>
      </div>
        @foreach($satellites as $satellite) 
        <div class="row">
        <div class="col satellite">
          <strong>{{ $satellite->name }} ({{ $satellite->longitude }}) </strong>
        </div>
      </div>
          @foreach($satellite->transponders as $transponder) 
          @if(count($transponder->channels) > 1)
        <div class="row transponder">
        <div class="col">
          {{ $transponder->frequency }} {{ $transponder->polarization }} 
          {{ $transponder->symbrate }} {{ $transponder->fec }} 
          {{ $transponder->tp_system }} {{ $transponder->modulation }} 
        </div>
      </div>
            @foreach($transponder->channels as $channel) 
                <div class="row channel">
                <div class="col-3">
                {{ $channel->name }}
                </div>
                <div class="col-sm-1 hidden-sm-down">
                  
                </div>
                <div class="col-2">
                  <span class="hidden-xs-down">{{ $channel->sid }}</span>
                </div>
                <div class="col">
                </div>
                <div class="col-1 hidden-sm-down">
                  {{ $channel->language }}
                </div>
                <div class="col col-sm">
                  FTA
                </div>
                <div class="col-sm-1 hidden-md-down">
                  16:9
                </div>
             </div>
                @endforeach
            @endif
         @endforeach
        @endforeach

     </div>
@endsection
