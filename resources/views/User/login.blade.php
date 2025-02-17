<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="shortcut icon" href="{{url('/imgs/pub.png')}}" />
  <script type="text/javascript">
    $(document).ready(function(){
      var formInputs = $('input[type="email"],input[type="password"]');
      formInputs.focus(function() {
       $(this).parent().children('p.formLabel').addClass('formTop');
       $('div#formWrapper').addClass('darken-bg');
       $('div.logo').addClass('logo-active');
     });
      formInputs.focusout(function() {
        if ($.trim($(this).val()).length == 0){
          $(this).parent().children('p.formLabel').removeClass('formTop');
        }
        $('div#formWrapper').removeClass('darken-bg');
        $('div.logo').removeClass('logo-active');
      });
      $('p.formLabel').click(function(){
       $(this).parent().children('.form-style').focus();
     });
    });
  </script>
</head>
@php
  Session::forget('level');
  Session::forget('username');
  Session::forget('password');
@endphp
<link href="{{url('/css/slide.css')}}" rel="stylesheet">
<link href="{{url('/css/footer.css')}}" rel="stylesheet">
<script src="{{url('https://code.jquery.com/jquery-2.1.0.min.js')}}" ></script>
<body background="{{url('imgs')}}/{{('pasim2.jpg')}}">
  <div id="formWrapper">
    <form action="{{url('login/masuk')}}" method="POST">
      {{csrf_field()}}
      <div id="form">
        @if(\Session::has('alert'))
        <div class="alert">
          {{Session::get('alert')}}!!
        </div>
        @endif
        <div class="logo">
          <img src="{{url('imgs')}}/{{('pub web.png') }}" width="100%" style="margin-left: 30px;">
        </div>
        <div>
            <b>HARAP DIBACA SEBELUM LOGIN!</b>
            <p> Saat ini sistem sedang dalam proses migrasi data ke sistem baru PUB dan integrasi dengan sistem TPA.
            Jika Anda melakukan suatu perubahan/modifikasi data, mohon informasikan ke sdr. Anggi Noufal Tanjung
            atau Raksa Aryasatya untuk menjaga data tetap konsisten dan aman.</p>
        </div>
        <div class="form-item">
          <input type="username" placeholder="Username" name="username" id="username" class="form-style" autocomplete="off"/>
        </div>
        <div class="form-item">
          <input type="password" placeholder="Password" name="password" id="password" class="form-style" />
           <div class="pw-view"><i class="fa fa-eye"></i></div> 
          <p><a href="{{url('')}}" ><small>Forgot Password ?</small></a></p>  
        </div>
        <div class="form-item">
          <p class="pull-left"><a href="{{url('/')}}"><small>Kembali</small></a></p>

          <input type="submit" class="login pull-right" value="Log In">
          <div class="clear-fix"></div>
        </div>
      </div>
    </form>
  </div>
  
</body>
</html>