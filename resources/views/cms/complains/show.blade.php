<div class="content-panel">
	<div class="title">
		<span class="subject">{{ $complain->subject }}</span><br />
		<span class="date">Date: {{ $complain->created_at }}</span><br />
		<span class="fullname">Name: {{ $complain->firstname }} {{ $complain->surname }}</span> <br />
		<span class="email">Email: <a href="email:to{{ $complain->email }}">{{ $complain->email }}</a></span> &nbsp;<span class="phone">Phone: {{ $complain->phone }} </span>
	</div>

	<div class="content">
		<p class="message">{{ $complain->message }}</p>
	</div>
</div>