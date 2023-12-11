<form action="{{route('form')}}" method="post">
    @csrf
    <input type="text" name="name" value="{{request()->name}}" placeholder="name">
    <input type="text" name="message" value="{{request()->email}}" placeholder="message">
    <button type="submit">Send</button>
</form>
