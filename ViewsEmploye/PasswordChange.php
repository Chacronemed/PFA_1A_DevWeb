<?php
require_once './SideBar/NewSideBar.php';

?>
<section class="home">
<div id="box">
  <form id="myform-search" method="post" autocomplete="off" action="./ControllerEmploye.php?action=changePassword">
    <h1>Change Password <span>choose a good one!</span></h1>
    <p>
      <input name="Password" type="password" value="" placeholder="Enter Password" id="p" class="password">
      <button class="unmask" type="button"></button>
    </p>
    <p>     
      <input type="password" value="" placeholder="Confirm Password" id="p-c" class="password">
      <button class="unmask" type="button"></button>
    </p>
    <div id="strong"><span></span></div>
    <div id="valid"></div>
    <small>Must be 6+ characters long and contain at least 1 uppercase letter, 1 number, and 1 special character</small>
  </form>
</div>

<style>
  html, body {
    min-height: 100%;
  }

  body {
    background: #f6f6f6 url(https://goo.gl/1yhE3P) top center no-repeat;
    background-size: cover;
    font-family: "Open Sans", sans-serif;
    font-size: 14px;
    margin: 0;
  }

  #box {
    width: 400px;
    margin: 10% auto;
    text-align: center;
    background: rgba(255, 255, 255, 0.6);
    padding: 20px 50px;
    box-sizing: border-box;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.2);
    border-radius: 2%;
  }

  h1 {
    margin-bottom: 1.5em;
    font-size: 30px;
    color: #484548;
    font-weight: 100;
  }

  h1 span, small {
    display: block;
    font-size: 14px;
    color: #989598;
  }

  small {
    font-style: italic;
    font-size: 11px;
  }

  form p {
    position: relative;
  }

  .password {
    width: 90%;
    padding: 15px 12px;
    margin-bottom: 5px;
    border: 1px solid #e5e5e5;
    border-bottom: 2px solid #ddd;
    background: rgba(255, 255, 255, 0.2) !important;
    color: #555;
  }

  .password + .unmask {
    position: absolute;
    right: 5%;
    top: 10px;
    width: 25px;
    height: 25px;
    background: transparent;
    border-radius: 50%;
    cursor: pointer;
    border: none;
    font-family: 'fontawesome';
    font-size: 14px;
    line-height: 24px;
    -webkit-appearance: none;
    outline: none;
  }

  .password + .unmask:before {
    content: "\f06e";
    position: absolute;
    top: 0;
    left: 0;
    width: 25px;
    height: 25px;
    background: rgba(205, 205, 205, 0.2);
    z-index: 1;
    color: #aaa;
    border: 2px solid;
    border-radius: 50%;
  }

  .password[type="text"] + .unmask:before {
    content: "\f070";
    background: rgba(105, 205, 255, 0.2);
    color: #06a;
  }

  #valid {
    font-size: 12px;
    color: #daa;
    height: 15px;
  }

  #strong {
    height: 20px;
    font-size: 12px;
    color: #daa;
    text-transform: capitalize;
    background: rgba(205, 205, 205, 0.1);
    border-radius: 5px;
    overflow: hidden;
  }

  #strong span {
    display: block;
    box-shadow: 0 0 0 #fff inset;
    height: 100%;
    transition: all 0.8s;
  }

  #strong .weak {
    box-shadow: 5em 0 0 #daa inset;
  }

  #strong .medium {
    color: #da6;
    box-shadow: 10em 0 0 #da6 inset;
  }

  #strong .strong {
    color: #595;
    box-shadow: 50em 0 0 #ada inset;
  }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.unmask').on('click', function() {
      var input = $(this).prev('input');
      if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        $(this).addClass('active');
      } else {
        input.attr('type', 'password');
        $(this).removeClass('active');
      }
    });

    // Begin supreme heuristics
    $('.password').on('keyup', function() {
      var p_c = $('#p-c');
      var p = $('#p');
      console.log(p.val() + p_c.val());
      if (p.val().length > 0) {
        if (p.val() !== p_c.val()) {
          $('#valid').html("Passwords Don't Match");
        } else {
          $('#valid').html('');
        }
        var s = 'weak';
        if (p.val().length > 5 && p.val().match(/\d+/g)) {
          s = 'medium';
        }
        if (p.val().length > 6 && p.val().match(/[^\w\s]/gi)) {
          s = 'strong';
        }
        $('#strong span').addClass(s).html(s);
      }
    });
  });
</script>

</section>