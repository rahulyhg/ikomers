@section('addcss')
<style>
.wrapper-upload {
    position: relative;
}
.btn-upload-foto {
    display: none;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 34px;
    width: 42px;
    margin: auto;
    background: #ff6633;
}
</style>
@endsection

<div class="text-center wrapper-upload">
    <img @isset($user->customers_picture) src="{{ $user->customers_picture }}" @endisset src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"  class="avatar img-circle img-thumbnail" alt="avatar">
    <form method="POST" action="{{ route('user.update.my-account') }}" enctype="multipart/form-data">
        <label class="btn btn-upload-foto">
            <i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" name="customers_picture" class="file-upload" style="display: none;">
        </label>
        <button type="submit" class="newbutton hidden">Save</button>
    </form>
</div>
<hr>
<br>

<ul class="list-faq">
    <li><a href="{{ route('user.account') }}">My Account</a></li>
    <li><a href="{{ route('user.order') }}">My Order</a></li>
</ul>

@section('addscript')

<script>
$(document).ready(function() {

    $(".btn-save").hide();
        
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    

    $(".avatar, .btn-upload-foto").mouseover(function(){
        $(".btn-upload-foto").show();
        console.log('tes');
    }).mouseout(function() {
        $(".btn-upload-foto").hide();
    });

    $(".file-upload").on('change', function(){
        readURL(this);
        
        $(".newbutton").removeClass('hidden');
    });
});
</script>

@endsection