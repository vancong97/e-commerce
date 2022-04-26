Xac thuc
<form action="{{ route('post.check.login') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="otp">
    <input type="submit" value="Check">

</form>
<span style="color: red">{{ $errors }}</span>


