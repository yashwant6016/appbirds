@extends('layout.master')
@section('title', 'Appbirds Task || Data')
@section('body')
<style>

</style>
<div class="main-section">
    <div class="list-view">
        <div class="add">
            @include('layout.message')
            <div class="link">
                <a href="{{Route('create')}}">Add Data</a>
            </div>
        </div>
        <table id="userList" class="userdata" style="width:100%">
            <thead>
                <tr>
                    <th>S NO.</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>About Details</th>
                    <th>Date Of Birth</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @if(Count($user)!=0)
                @foreach ($user as $i=>$item)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->Country}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->mobile_number}}</td>
                    <td>{{$item->About_you}}</td>
                    <td>{{date('d/m/Y',strtotime($item->birthday))}}</td>
                    <td>
                        <a href="{{Route('edit-user',['id'=>$item->id])}}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8">NO RECORD FOUND</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div> 
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#userList').DataTable();
});
</script>
@endsection