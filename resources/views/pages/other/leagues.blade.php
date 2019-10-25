@if(isset($json))
    <pre>{{$json}}</pre>
@endif

<form method="post" action="{{url('formater/leagues')}}">
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <button type="submit">Submit</button>
    {{csrf_field()}}
</form>