@include('parts.header')

<div class="container px-2">

    @if(session()->has('name'))

        <div class="py-3">
            <h5 class="text-secondary">Welcome, {{session('name')}}</h3>
            <div class="input-group col-auto">
                <input id="copyit" type="text" class="form-control" onclick="this.select()" value="{{url('/group').'/'.$group}}" readonly>
                <button onclick="copylink(this)" type="button" class="btn btn-primary">copy</button>
            </div>
            <div class="text-muted text-small mt-2 ms-2">
                Share this link with your friends so that they can also join this group and start chatting.
            </div>
        </div>

    @endif

    <div class="row justify-content-center">
        <div id="parent" style="max-height:500px;overflow-y:auto;position:relative;bottom:0;" class="col-12 col-lg-8 rounded-lg mt-4">
            
            @isset($chats)

                @foreach($chats as $chat)

                    <div>
                        <div class="px-2 d-inline-block bg-light text-dark fw-bold py-1" style="border-top-left-radius: 10px;text-transform:capitalize;">{{ $chat->uname}}</div>
                        <div class="p-2 d-inline-block text-small text-muted bg-light">ip {{ $chat->userip }}</div>
                        <p class="bg-light text-dark p-2 mb-3">
                            {{ $chat->message }}
                        </p>
                    </div>

                @endforeach
            @endisset
        
        </div>
    </div>

    <div class="row justify-content-center">
        <div style="background:rgb(240, 231, 231); @if(!(session()->has('name'))) visibility:hidden;@endif " class="col-lg-10 rounded py-3 my-4">
                @csrf
                <div class="input-group">
                    <input  id="messagebox" type="text" placeholder="enter your message here" class="form-control">
                    <button type="button" onclick="sendmessage()" class="btn px-4 btn-secondary" >send</button>
                </div>
        </div>
    </div>
</div>

<div id="askmyname" class=" @if(session()->has('name')) 
    {{"d-none"}} @endif
    position-absolute d-block w-100 top-0 h-100" style="background:rgba(255,255,255,0.5);padding-top:10%;">
    <div class="row justify-content-center align-items-start">
        <div class="col-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Welcome
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text text-muted mb-2">
                        Please enter your name to join the group.
                    </div>
                    <form class="input-group" method="post">
                        @csrf
                        <input placeholder="enter your name here" class="form-control" type="text" name="name">
                        <button onclick="submitm" type="button" class="bi btn btn-primary bi-check-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                              </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer src="{{url('/').'/assets/js/group.js'}}"></script>

@include('parts.footer')