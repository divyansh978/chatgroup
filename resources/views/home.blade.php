@include('parts.header')

<div class="main-content text-center container-fluid">

  <div class="row justify-content-center">
    <div class="col-11 col-md-7">
      <h1 class="text-center pt-5">Now chat with your friends without any signup and login.</h1>
    </div>
  </div>
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-10 col-md-7 col-lg-6">

        @csrf
        <div class="mb-3 input-group">
          <span id="inputgrouptxt" class="input-group-text">{{url('/group/').'/'}}</span>
          <input type="text" id="groupname" class="form-control" placeholder="enter group name here" aria-describedby="helpId">
          <button type="button" onclick="checkgroup(this)" class="btn btn-primary">create</button>
        </div>
        <span style="visibility:hidden" id="groupwarning" class="text-danger"> * This group already exists please choose another name.</span>

  </div>
  <div class="col-12 text-center">
    <p id="error" class="text-small d-none text-danger">This group already exists please choose another name.</p>
    <p id="spinner" class="spinner-border d-none text-primary">
    </p>
  </div>
</div>

<div class="row py-5">

  <div class="col-12">
    <div class="row mb-3 justify-content-center">
      <div class="col-md-10 col-11 border-bottom col-lg-9">
        <h2 class="my-3">Frequently Asked Questions:</h2>
      </div>
    </div>
  </div>

  <div class="accordion col-11 col-md-9 col-lg-8 container" id="frequent" >
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" >
          How to use it?
        </button>
      </h2>

      <div id="collapse1" class=" collapse show" data-bs-parent="#frequent">
        <div class="accordion-body">
          <p>
            You can use this web app to create a group and after creating a group you can share its link with your friends so that your friends can use it to join that group and then you and your friends can chat in that group. Its like google meet where you start a video meeting and then share its link with people who can join that metting, but with this web app you can send and receive text messages.
          </p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
          How many users can use it simultaneously?
        </button>
      </h2>
      <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#frequent">
        <div class="accordion-body">
          <p>There is no limit on the no. of users.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{url('/assets/js/home.js?kdflklk')}}" defer>
</script>

@include('parts.footer')
