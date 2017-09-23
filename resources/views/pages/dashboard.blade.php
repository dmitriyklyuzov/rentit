@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            {{-- Info --}}
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>{{$user->name}}</h3>
                    <p>{{$user->email}}</p>
                    <p>{{$user->phone}}</p>
                    <p>Current time is {{Carbon::now()}}</p>
                    
                </div>
            </div>

            {{-- My properties --}}
            <div class="panel panel-default">
                <div class="panel-heading">My properties</div>

                <div class="panel-body">
                    @if(count($properties)>0)
                    <ul class="list-group">
                        @foreach($properties as $property)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4>
                                        <a href="{{route('properties.show', ['id' => $property->id])}}">
                                           {{$property->title}}
                                        </a> - <small>${{$property->price}}</small>
                                    </h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="pull-right">
                                        <a href="{{route('properties.show', ['id' => $property->id])}}" class="btn btn-default btn-sm">View</a>
                                        <a href="/properties/{{$property->id}}/edit" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('properties.destroy', ['id'=>$property->id]) }}" method="post" class="display-inline" onsubmit=" return confirmBeforeDeleting({{ $property->id }}); ">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </div>    
                                </div>
                                
                            </div>
                            <p>{{$property->getFullAddress()}}</p>
                            {{-- Created on 1/10/2017 at 3:37PM --}}
                            <p>Created on {{Carbon::parse($property->created_at)->format('j/m/y')}} at {{Carbon::parse($property->created_at)->format('g:i A')}}</p>
                        </li>
                        @endforeach
                    </ul>
                    @else
                        <p>You have no properties listed. Why not <a href="/properties/create">create one</a>?</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
