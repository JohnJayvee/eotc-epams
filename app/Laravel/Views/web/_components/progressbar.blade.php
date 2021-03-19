<ul id="progressbar">
    <li class="{{Session::get('current_progress') == 1 ||  Session::get('current_progress') == 2 ? "active" : ""}}" id="account_details"><strong>Account Details</strong></li>
    
    <li class="{{Session::get('current_progress') == 2 ? "active" : ""}}" id="upload"><strong>Upload Goverment ID'S</strong></li>
</ul>
<!-- <div class="progress mb-3">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:{{ Session::get('percent') }}%"></div>
</div> -->