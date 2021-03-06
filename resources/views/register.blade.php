@extends('layouts.nolayout')
@section('content')

<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 </script>
 <div id="contentinner">
 <div class="outer">
	<div class="middle">
		<div class="inner">
								
			<h2 >{{trans('user_texts.register_account')}}</h2>
			<form id="registerForm" method="POST" action="{{{ (Auth::check('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
				<input type="hidden" name="_token" id="_token" value="{{{ Session::token() }}}">
				<h3>{{trans('user_texts.your_details')}}</h3>
				<table class="table register">
					<tbody>
						<?php
						/*
						<tr>
							<th style="width:180px;">{{trans('user_texts.fullname')}}</th>
							<td><input minlength="2" type="text" required="" name="fullname" id="fullname" value="{{{ Request::old('fullname') }}}"></td>
						</tr>
						*/
						?>
						<tr>
							<th style="width:180px;">{{{ Lang::get('confide::confide.username') }}}</th>
							<td>
								<input minlength="2" type="text" required="" class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" name="username" id="username" value="{{{ Request::old('username') }}}">
								<span>This will be your used for your login and confirming withdrawals.</span>
							</td>
						</tr>
						<tr>
							<th>{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></th>
							<td><input type="text" name="email" id="email" required="" class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" value="{{{ Request::old('email') }}}"><br>
								<span>This will be your used for your login and confirming withdrawals.</span>
							</td>
						</tr>
						<tr>
							<th>{{{ Lang::get('confide::confide.password') }}}</th>
							<td><input type="password" name="password" id="password" class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}"><br>
								<span>Please enter 8 characters minimum, including 1 or more digits.</span>
							</td>
						</tr>
						<tr>
							<th>{{{ Lang::get('confide::confide.password_confirmation') }}}</th>
							<td><input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation"><br>
								<span>Please type your password again.</span>
							</td>
						</tr>
					</tbody>
				</table>
				<?php
				/*
				<h3>Security Questions</h3>
				Please answer two security questions below, these will be used if you ever lose access to your account.<br>Be aware that these answers cannot be changed once you have set up your account.<br><br>
				<table class="table register">
					<tbody>
						<tr>
							<th style="width:180px;">Security Question 1</th>
							<td>
								<select name="question1" class="form-control">
									@foreach($question1s as $question1)
										<option value="{{$question1->id}}" @if(Request::old('question1')==$question1->id) selected @endif>{{$question1->questions}}</option>
									@endforeach
									<!-- <option value="1">What was the name of your first school?</option>
									<option value="2">In what city or town was your first job?</option>
									<option value="3">What is the name of your favorite childhood friend?</option>
									<option value="4">Who was your childhood hero?</option>
									<option value="5">Where were you when you had your first alcoholic drink or cigarette?</option>
									<option value="6">Where were you when you had your first kiss?</option>
									<option value="7">Where did you meet your significant other?</option> -->
								</select>
								<input type="text" name="answer1" value="{{{ Request::old('answer1') }}}">
							</td>
						</tr>
					<tr>
						<th>Security Question 2</th>
							<td>
								<select name="question2" class="form-control">
									@foreach($question2s as $question2)
										<option value="{{$question2->id}}" @if(Request::old('question2')==$question2->id) selected @endif>{{$question2->questions}}</option>
									@endforeach
									<!-- <option value="1">What is the name of your first pet?</option>
									<option value="2">What street did you grow up on?</option>
									<option value="3">What was the name of the hospital where you were born?</option>
									<option value="4">What was your dream job as a child?</option>
									<option value="5">What country is your dream holiday destination?</option>
									<option value="6">What was the make and model of your first car?</option>
									<option value="7">What is your mother's maiden name?</option> -->
								</select>
							<input type="text" name="answer2" value="{{{ Request::old('answer2') }}}">
						</td>
					</tr>
					</tbody>
				</table>
				*/
				?>
				<h3>Verification</h3>
				<div align="center">
					<script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k={{$recaptcha_publickey}}"></script>
					<script type="text/javascript" src="https://www.google.com/recaptcha/api/js/recaptcha.js"></script>
					<noscript>
					&lt;iframe src="https://www.google.com/recaptcha/api/noscript?k={{$recaptcha_publickey}}" height="300" width="500" frameborder="0"&gt;&lt;/iframe&gt;&lt;br/&gt;
					&lt;textarea name="recaptcha_challenge_field" rows="3" cols="40"&gt;&lt;/textarea&gt;
					&lt;input type="hidden" name="recaptcha_response_field" value="manual_challenge"/&gt;
					</noscript>
					<div id="captchaStatus"></div>
					<br>
					
					
					<input type="checkbox" name="termsofservice" id="termsofservice"><label for="termsofservice">&nbsp; {{trans('user_texts.i_agree_terms')}}</label> {{ HTML::link('post/terms', trans('user_texts.term_service')) }}<a href="/terms/"></a>.
					
							  
					<br><br>
				</div>
				@if ( Session::get('error') )
					<div class="alert alert-error alert-danger">
						@if ( is_array(Session::get('error')) )
							{{ head(Session::get('error')) }}
						@endif
					</div>
				@endif

				@if ( Session::get('notice') )
					<div class="alert alert-info">{{ Session::get('notice') }}</div>
				@endif
				<div align="center">
					<input type="hidden" value="@if(isset($referral)){{$referral}}@else{{{Request::old('referral')}}}@endif" name="referral">
					<button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
				</div>
			   
			</form>
		</div>
	</div>
</div>
</div>
{{ HTML::script('assets/js/jquery.validate.min.js') }}
<script type="text/javascript">
    $(document).ready(function() {
        $.validator.addMethod("CharNumsOnly", function(value, element) {
            return this.optional(element) || /^[a-z0-9 _@\-]+$/i.test(value);
        }, "This field must contain only letters, numbers, or dashes.");

        $("#registerForm").validate({
            rules: {
				/*
                fullname: {
                    CharNumsOnly: false,
                    required: true,
                },
                username: {
                    CharNumsOnly: true,
                    required: true,
                },
                answer1: {
                    CharNumsOnly: false,
                    required: true,
                    minlength: 2
                },
				*/
				password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },
                email: {
                    CharNumsOnly: false,
                    required: true,
                    email: true
                },
                answer2: {
                    required: true,
                    minlength: 2
                },
                termsofservice: "required"
            },
            messages: {
                /*
				fullname: {
                    required: "Please enter a username.",
                    CharNumsOnly: "Full Name must contain only letters, numbers, or dashes.",
                },
                answer1: "Please answer the security question.",
                answer2: "Please answer the security question.",
				*/
				password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 8 characters long."
                },
                confirm_password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 8 characters long.",
                    equalTo: "Please enter the same password as above."
                },
                username: {
                    required: "Please enter a username.",
                    CharNumsOnly: "Username must contain only letters, numbers, or dashes.",
                },
                email: {
                    email: "Please enter a valid email address.",
                    CharNumsOnly: "Email Address must contain only letters, numbers, or dashes.",
                },
                termsofservice: "Please accept our TOS.<span><span></span></span>"
            }
	});

       
        $("#registerForm").submit(function(event) {
          event.preventDefault();
            var challengeField = $("input#recaptcha_challenge_field").val();
            var responseField = $("input#recaptcha_response_field").val(); 
            console.log('responseField',responseField);         
			
			$.ajax({
				type: 'post',
				url: '<?php echo action('UserController@checkCaptcha')?>',
				datatype: 'json',
				data: {recaptcha_challenge_field: challengeField, recaptcha_response_field: responseField },
				beforeSend: function(request) {
					return request.setRequestHeader('X-CSRF-Token', $("#_token").val());
				},
				success:function(response) {
					if(response == 1){   
						document.getElementById("registerForm").submit();                  
						return true;
					}else{
						$("#captchaStatus").html("<label class='error'>Your captcha is incorrect. Please try again</label>");
						Recaptcha.reload();
						return false;
					}
				}, error:function(response) {
					showMessageSingle('{{{ trans('texts.error') }}}', 'error');
				}
			});
			
            <?
			/*
			$.post('<?php echo action('UserController@checkCaptcha')?>', {recaptcha_challenge_field: challengeField, recaptcha_response_field: responseField }, function(response){
                if(response == 1){   
                    document.getElementById("registerForm").submit();                  
                    return true;
                }else{
                    $("#captchaStatus").html("<label class='error'>Your captcha is incorrect. Please try again</label>");
                    Recaptcha.reload();
                    return false;
                }
            });
			*/
			?>
        });
   });
</script>
@stop