<header>
    <h1>{{$header}}</h1>
</header>
<div>
    {{strip_tags(html_entity_decode($content), '<br>, <h2>, <h3>, <ul>, <li>, <p>, <span>')}}
</div>
<footer>
    {{$footer}}
</footer>