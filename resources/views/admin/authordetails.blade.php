@extends('admin.layout.app')

@section('maincontent')
<div class="container-fluid content-inner pb-0">
    <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between border-0 m-3">
               <div class="header-title ">
                  <h4 class="card-title">Author Book Details  </h4>
               </div>
                     @if(Session('success'))
                        <span class="alert alert-success" role="alert">{{session('success')}}</span>
                        @endif
                        @if(Session('error'))
                        <span class="alert alert-danger" role="alert">{{session('error')}}</span>
                        @endif
                        <div class="header-title ">
                            {{-- <input type="text" name="search" id="search"  class="form-control" placeholder="Search Books"> --}}
                           
                            {{-- <button type="submit" class="btn btn-secondary"> Search</button> --}}
                         </div>
               <div class="header-title ">
               <a href="{{url('admin/addbook')}}" class="btn btn-success">Add Book</a>
             </div>
            </div>
            
            <div class="card-body p-0">
               <div class="table-responsive">
                  <div id="search_list"> </div>
                  <table id="basic-table" class="table table-striped table-shadow mb-0" role="grid">
                     <thead class="border-0">
                        <tr>
                           <th>ID</th>
                           <th>Bookname</th>
                           <th>Author Name</th>
                           <th>Created</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user)
                        <tr>
                           <td>{{$user->id}}</td>
                           <td>{{$user->book_name}} </td>
                           <td>{{$user->author_name}}</td>
                           <td>{{$user->created_at}}</td>
                           <td>
                            <a href="{{'update/'.$user->id}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{'delete/'.$user->id}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> 
                           </td>
                        </tr>  
                        @endforeach
                        {{-- <tr>
                           <th>Total </th>
                           <td>{{$author}}</td>
                           <td>{{$count}}</td>
                        </tr> --}}
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection