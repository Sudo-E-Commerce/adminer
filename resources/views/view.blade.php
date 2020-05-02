@extends('Core::layouts.app')

@section('title') @lang('Adminer::general.title') @endsection

@section('content')
<div class="col-lg-12" style="padding: 0">
	<iframe src="{{ route('admin.adminer.index') }}" style="width: 100%; height: calc(100vh - 145px)" frameborder="0"></iframe>
</div>
@endsection