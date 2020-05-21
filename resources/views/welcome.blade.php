<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Short you URL</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
</head>
<body>
<div id="messageBox">

</div>
<div class="wrapper">
    <div class="header">
        <h3 class="short-in">
            Short you URL <span class="main-page">Open Graph</span>
        </h3>
        {{--<div class="button"><a href="">Sign in</a></div>--}}
    </div>
    <div class="clear"></div>
    <form action="{{ route('gl.post') }}" method="POST" id="short">

        <div>
            <label for="email" class="lock">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <g>
        <path d="M474.562,37.446c-49.928-49.928-131.135-49.928-181.063,0L220.2,110.744c-3.115,3.115-3.991,7.825-2.219,11.846
			c1.771,4.032,5.522,6.616,10.252,6.356l3.251-0.24c5.533-0.51,11.19-0.094,16.785,0.427c9.388,0.854,19.223,2.844,30.08,6.074
			c3.772,1.156,7.825,0.094,10.586-2.678l49.824-49.824c24.172-24.172,66.37-24.172,90.542,0c24.964,24.964,24.964,65.577,0,90.541
			l-71.375,71.374c-5.617-22.019-16.668-41.752-32.733-57.809c-21.026-21.036-48.293-33.633-78.852-36.435
			c-26.527-2.313-52.669,3.303-75.559,16.525c-10.93,6.335-19.4,12.659-26.652,19.911L37.438,293.503
			c-49.918,49.917-49.918,131.144,0,181.061C62.403,499.528,95.181,512,127.97,512c32.789,0,65.567-12.472,90.532-37.435
			l73.278-73.277c3.105-3.105,3.991-7.793,2.23-11.815c-1.761-4.022-5.97-6.731-10.18-6.387l-3.386,0.24
			c-5.449,0.531-11.096,0.052-16.712-0.458c-9.367-0.854-19.213-2.844-30.09-6.074c-3.793-1.136-7.814-0.094-10.575,2.688
			l-49.824,49.824c-24.172,24.172-66.37,24.172-90.542,0c-24.964-24.964-24.964-65.577,0-90.541l71.375-71.374
			c5.617,22.019,16.668,41.752,32.733,57.808c21.036,21.036,48.303,33.633,78.862,36.425c3.98,0.365,7.95,0.542,11.909,0.542
			c22.391,0,44.187-5.814,63.64-17.056c10.93-6.335,19.4-12.659,26.652-19.911l106.692-106.691
			C524.479,168.59,524.479,87.363,474.562,37.446z M295.679,295.709c-23.009,6.991-47.184,0.646-63.611-15.772
			c-16.656-16.656-22.488-41.152-15.75-63.626c23.051-6.956,47.205-0.639,63.615,15.761
			C296.592,248.731,302.421,273.232,295.679,295.709z"/>
    </g>
</g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
</svg>

            </label>
            <input type="text" name="link" id="link" placeholder="enter your link" />
            <div class="emrr"></div>
        </div>

        <div>
            <label for="email" class="lock">
                <svg id="bold" enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m17.25 15.5c-4.82 0-8.75-3.93-8.75-8.75 0-2.71 1.24-5.14 3.19-6.75h-8.94c-1.52 0-2.75 1.23-2.75 2.75v18.5c0 1.52 1.23 2.75 2.75 2.75h14.5c1.52 0 2.75-1.23 2.75-2.75v-6.19c-.86.28-1.79.44-2.75.44zm-11 2h-.5v3.75c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-3.75h-.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h2.5c.414 0 .75.336.75.75s-.336.75-.75.75zm5.656 3.386c.201.362.071.819-.292 1.02-.115.064-.24.094-.364.094-.263 0-.519-.139-.656-.386l-.594-1.069-.594 1.07c-.137.246-.393.385-.656.385-.124 0-.249-.03-.364-.094-.362-.201-.493-.658-.292-1.02l1.048-1.886-1.048-1.886c-.201-.362-.071-.819.292-1.02.361-.202.818-.071 1.02.292l.594 1.069.594-1.07c.201-.362.659-.493 1.02-.292.362.201.493.658.292 1.02l-1.048 1.887zm4.344-3.386h-.5v3.75c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-3.75h-.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h2.5c.414 0 .75.336.75.75s-.336.75-.75.75z"/><path d="m17.25 0c-3.722 0-6.75 3.028-6.75 6.75s3.028 6.75 6.75 6.75 6.75-3.028 6.75-6.75-3.028-6.75-6.75-6.75zm2.75 7.75h-1.75v1.75c0 .552-.448 1-1 1s-1-.448-1-1v-1.75h-1.75c-.552 0-1-.448-1-1s.448-1 1-1h1.75v-1.75c0-.552.448-1 1-1s1 .448 1 1v1.75h1.75c.552 0 1 .448 1 1s-.448 1-1 1z"/></svg>
            </label>
            <input type="text" name="title" id="title" placeholder="enter link title" />
            <div class="emrp"></div>
        </div>
        <div>
            <label for="password" class="lock">
                <svg id="bold" enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m17.25 15.5c-4.82 0-8.75-3.93-8.75-8.75 0-2.71 1.24-5.14 3.19-6.75h-8.94c-1.52 0-2.75 1.23-2.75 2.75v18.5c0 1.52 1.23 2.75 2.75 2.75h14.5c1.52 0 2.75-1.23 2.75-2.75v-6.19c-.86.28-1.79.44-2.75.44zm-11 2h-.5v3.75c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-3.75h-.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h2.5c.414 0 .75.336.75.75s-.336.75-.75.75zm5.656 3.386c.201.362.071.819-.292 1.02-.115.064-.24.094-.364.094-.263 0-.519-.139-.656-.386l-.594-1.069-.594 1.07c-.137.246-.393.385-.656.385-.124 0-.249-.03-.364-.094-.362-.201-.493-.658-.292-1.02l1.048-1.886-1.048-1.886c-.201-.362-.071-.819.292-1.02.361-.202.818-.071 1.02.292l.594 1.069.594-1.07c.201-.362.659-.493 1.02-.292.362.201.493.658.292 1.02l-1.048 1.887zm4.344-3.386h-.5v3.75c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-3.75h-.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h2.5c.414 0 .75.336.75.75s-.336.75-.75.75z"/><path d="m17.25 0c-3.722 0-6.75 3.028-6.75 6.75s3.028 6.75 6.75 6.75 6.75-3.028 6.75-6.75-3.028-6.75-6.75-6.75zm2.75 7.75h-1.75v1.75c0 .552-.448 1-1 1s-1-.448-1-1v-1.75h-1.75c-.552 0-1-.448-1-1s.448-1 1-1h1.75v-1.75c0-.552.448-1 1-1s1 .448 1 1v1.75h1.75c.552 0 1 .448 1 1s-.448 1-1 1z"/></svg>
            </label>
            <input type="text" name="description" id="description" placeholder="enter your description" />
            <div class="emrps"></div>
        </div>

        <div class="upload-image">
            <div class="preload">
                <img src="{{asset('images/preload.gif')}}" alt="">
            </div>

            <div class="final-image">
                <div class="upload-image__head">
                    <span>Preview</span> your image
                </div>
                <img src="{{asset('images/default.jpg')}}" class="uif" alt="">
            </div>

            <div class="overlay">
                <div class="upload-image__head">
                    <span>Upload</span> your image
                </div>
                <div class="upload-button">
                    <div class="ub" data-url="{{route('upload.image')}}">choose..</div>
                    <input type="file" id="upload-image" multiple="false" hidden>
                    <input type="text" name="image" value="default.jpg" hidden>
                </div>
            </div>

        </div>

        <div>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="submit" value="Shorten the link" />
        </div>

    </form>

    <div class="short-links">
        @if(session()->has('sl'))
            @foreach(session()->get('sl') as $link)
                <a href="{{ $link['link'] }}" target="_blank">{{ $link['link'] }}</a>
            @endforeach
        @endif
    </div>


</div>

<script>
    var url = '{{URL::current()}}',
        path = '{{route('upload.image')}}';
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script>
    $.validator.addMethod("nregex", function(value, element) {
        return this.optional( element ) || /^[A-ZА-Я][a-zа-я]+$/.test(value);
    }, 'Please enter a valid name');

    $.validator.addMethod("lregex", function(value, element) {
        return this.optional( element ) || /^[A-ZА-Я][a-zа-я]+$/.test(value);
    }, 'Please enter a valid lastname');

    $.validator.addMethod("vemail", function(value, element) {
        return this.optional( element ) || /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/.test(value);
    }, 'Please enter a valid email. Example: music@armaxmusic.com');

    $.validator.addMethod("vphone", function(value, element) {
        return this.optional( element ) || /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test(value);
    }, 'Please enter a valid phone. Example: +77777892828');

    $('#short').validate({

        errorPlacement: function (error, element) {
            if (element.attr("name") == "link") {
                error.appendTo(".emrr");
            }
            else if (element.attr("name") == "title") {
                error.appendTo(".emrp");
            }
            else if (element.attr("name") == "description") {
                error.appendTo(".emrps");
            }
            else {
                error.insertAfter(element);
            }
        },
        rules: {
            link: {
                required: true,
                minlength: 2,
                maxlength: 255,
                url: true
            },
            title: {
                required: true,
                minlength: 2,
                maxlength: 255,
            },
            description: {
                required: true,
                minlength: 2,
                maxlength: 255,
            }
        },
        messages: {
            link: {
                required: "Enter your <span>URL</span>",
                minlength: "The <span>name</span> must contain at least {0} characters",
                maxlength: "Field must contain no more than {0} characters"
            },
            email: {
                required: "Enter your <span>email</span>",
                maxlength: "Field must contain no more than {0} characters",
                vemail: "Please enter a valid <span>email</span>. Example: music@armaxmusic.com",
                remote: "Email <span>{0}</span> is already exist"
            },
            messenger: {
                required: "Choose your main messenger"
            },
            password: {
                required: "Enter you password",
                minlength: "Password must contain at least {0} characters",
                maxlength: "Password must contain no more than {0} characters"
            }
        },
        errorElement: "div",
        highlight: function(element) {
            $(element).siblings('label').children('svg').children('path').attr('style', 'fill: #99C800;').attr('style', 'fill: red;');
            $(element).siblings('label').children('svg').children('g').children('g').children('path').attr('style', 'fill: #99C800;').attr('style', 'fill: red;');
        },
        unhighlight: function(element) {
            $(element).siblings('label').children('svg').children('path').attr('style', 'fill: #99C800;');
            $(element).siblings('label').children('svg').children('g').children('g').children('path').attr('style', 'fill: #99C800;');
        }
    });
</script>
</body>
</html>