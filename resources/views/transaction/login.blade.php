<!doctype html>
<html>
<head>
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.min.js') }}"></script>
<link href="{{ URL::asset('selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
<script type="text/javascript" src='{{ URL::asset("selectize/js/standalone/selectize.min.js") }}'></script>
<title>Look at me Login</title>
</head>
<body>
@if(session('message'))
		<p>{{session('message')}}</p>
@endif

<form action="login" method="POST">
	<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
	<label>Username</label><input type="text" name="username">
	<br>
	<label>Password</label> <input type="password" name="password">
	<input type="submit">
</form>
<br>
<br>
@foreach($adviser as $key => $val)
	<img src={{ $val->imagepath }}>
	{{ $val->fname }} {{ $val->fname }}

	<br>

@endforeach

<br>
<select id="searchbox" name="q" placeholder="Search Advisers or category" class="form-control"></select>
<script>
	$(document).ready(function(){
    $('#searchbox').selectize({
        valueField: 'url',
        labelField: 'name',
        searchField: ['name'],
        maxOptions: 10,
        options: [],
        create: false,
        render: {
            option: function(item, escape) {
                return '<div><img src="'+ item.icon +'">' +escape(item.name)+'</div>';
            }
        },
        optgroups: [
            {value: 'advisers', label: 'Advisers'},
            {value: 'category', label: 'Categories'}
        ],
        optgroupField: 'class',
        optgroupOrder: ['product','category'],
        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: root+'/api/search',
                type: 'GET',
                dataType: 'json',
                data: {
                    q: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res.data);
                }
            });
        },
        onChange: function(){
            window.location = this.items[0];
        }
    });
});
</script>
</body>
</html>