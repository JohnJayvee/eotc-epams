<h3>Business CV</h3>
<ul id="progressbar" class="business">
    <li class="{{Session::get('current_progress') == 1 ||  Session::get('current_progress') == 2 ||  Session::get('current_progress') == 3? "active" : ""}}" id="company_details"><strong>Company Details</strong></li>
    <li class="{{Session::get('current_progress') == 2 ||  Session::get('current_progress') == 3 ? "active" : ""}}" id="address_details"><strong>Site Address Details</strong></li>
    <li class="{{Session::get('current_progress') == 3 ? "active" : ""}}" id="contact_details"><strong>Company Contact Details</strong></li>
</ul>