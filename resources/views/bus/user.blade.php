@extends('base')
<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css'>
@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3" style="margin: 20px 0 20px 35%;">哭阿車車</h1>

        <div class="col-sm-12">
            @if ($errors->any())
            <div class="alert alert-danger">

                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
            @endif

            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->get('fail'))
            <div class="alert alert-warning">
                {{ session()->get('fail') }}
            </div>
            　　 @endif
        </div>

        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <td>
                        <h5>公車車號</h5>
                    </td>
                    <td>
                        <h5>路程(去程:0 回程:1)</h5>
                    </td>
                    <td>
                        <h5>站牌</h5>
                    </td>
                    <td>
                        <h5>查詢時間</h5>
                    </td>

                    <td><a href="{{ url('bus/create') }}" class="btn btn-primary">查詢</a></td>
                </tr>
            </thead>
            <tbody>
                @foreach($bus as $buss)
                <tr>
                    <td>{{$buss->number}}</td>
                    <td>{{$buss->goback}}</td>
                    <td>{{$buss->stop}}</td>
                    <td>{{$buss->created_at}}</td>
                    <td>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endsection
