@include('includes.header')


@include($content)

@include('includes.scripts')
@if(!empty($script))
@include($script)

@endif

@include('includes.footer')