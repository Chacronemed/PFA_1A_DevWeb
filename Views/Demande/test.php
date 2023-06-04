<style>
    @import url('https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap');

    /** Core Styles **/
    h1,
    h2,
    h3 {
        font-weight: 900;
    }

    h3 {
        color: #4E787E;
        text-transform: uppercase;
        font-size: 19px;
        letter-spacing: 2px;
        margin-top: 40px;
    }

    /** Layout **/
    .container {
        min-height: 100vh;
        width: 100vw;
        min-width: 900px;
        padding: 80px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #CDE7EB;
        font-family: Lato, sans-serif;
    }

    .container .column {
        min-width: 800px;
    }

    /** The Original Design **/
    .friend-request-card {
        display: flex;
        width: 100%;
        padding: 20px;
        flex-direction: row;
        align-items: center;
        background: #fff;
        border-radius: 8px;
        box-shadow: 6px 6px 10px rgba(0, 0, 0, 0.6);
    }

    .friend-request-card .profile-picture {
        width: 100px;
        height: 100px;
        border-radius: 100%;
        margin-right: 27px;
        overflow: hidden;
    }

    .friend-request-card .profile-picture img {
        width: 100px;
        height: 100%;
    }

    .friend-request-card h1,
    .friend-request-card h2 {
        margin-bottom: 0;
        margin-top: 0;
    }

    .friend-request-card h1 {
        color: #001D37;
        font-size: 44px;
    }

    .friend-request-card h2 {
        color: #6B7880;
        font-size: 24px;
    }

    .friend-request-card .friend-request-actions {
        margin-left: auto;
        width: 180px;
    }

    .friend-request-card .button {
        font-family: Lato, sans-serif;
        border-radius: 100px;
        width: 100%;
        padding: 14px 10px;
        border: none;
        font-size: 18px;
        font-weight: 700;
        transition: background .3s;
        cursor: pointer;
    }

    .friend-request-card .button:first-child {
        margin-bottom: 14px;
    }

    .friend-request-card .button.button-primary {
        background: #3A9BDE;
        color: #fff;
    }

    .friend-request-card .button.button-primary:hover {
        background: #2985b7;
    }

    .friend-request-card .button.button-secondary {
        background: #6F8493;
        color: #fff;
    }

    .friend-request-card .button.button-secondary:hover {
        background: #5e737f;
    }
</style>
<div class="container">
  <div class="column">
    
    <h3>Before</h3>
    <div class="friend-request-card">
      <div class="profile-picture">
        <img src="https://thepracticaldev.s3.amazonaws.com/i/sldkglekmnqc4outtfqd.jpg">
      </div>
      <div class="user-details">
        <h1>Love Grayson</h1>
        <h2>13 Mutual Friends</h2>
      </div>
      <div class="friend-request-actions">
        <button class="button button-primary">Accept</button>
        <button class="button button-secondary">Decline</button>
      </div>
    </div>

  </div>
</div>
