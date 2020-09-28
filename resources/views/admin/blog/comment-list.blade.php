@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('errors.errors-and-messages')
                <div class="card-header"> Comment's List</div>
                
                <div class="card-body">
                <table id="list" class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($comments)
                                @foreach($comments as $k => $comment)
                                <tr>
                                    <td>{{$k+1}}</td>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->email}}</td>
                                    <td>{{$comment->message}}</td>
                                    <td>@if($comment->is_approve == 1)<a href="#" class="btn btn-success btn-sm disabled">Approved</a>
                                    @elseif($comment->is_approve == 2)<a href="#" class="btn btn-danger btn-sm disabled">Rejected</a>
                                    @else
                                    <a href="{{ route('admin.blog.comment.approve',  $comment->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>Accept</a>&nbsp;&nbsp;<a href="{{ route('admin.blog.comment.reject',  $comment->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>Reject</a>
                                    @endif
                                    </td>
                                   
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>No Comments Found</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endif
                            </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection