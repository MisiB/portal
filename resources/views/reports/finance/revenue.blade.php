@extends('layouts.reports')

@section('content')
<div class="container">
   
<nav aria-label="breadcrumb mt-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('revenuereport.index')}}">Back to Main Portal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Supplier Revenue Download</li>
  </ol>
</nav>
<div class="row mt-4">
    <div class="col-md-6 offset-md-3">
        <x-forms.errors/>
    <div class="card">
        <div class="card-body">
         
                <form action="{{route('report-revenue-downloads.store')}}" method="POST">
                    @csrf
                 <x-forms.input name="startdate" type="date" label="From" size="col-md-12"/>
                 <x-forms.input name="enddate" type="date" label="To" size="col-md-12"/>
                 <x-forms.select name="currency" label="Currency" :optionlist="$currency" size="col-md-12"/>
                 
                 <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </form>
                 
            
        </div>
    </div>
    </div>
</div>
</div>

@endsection