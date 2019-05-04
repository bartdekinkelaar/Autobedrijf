<div class="col-2 cmsHeader">
    <img class="cmsLogo" src="{{ URL::asset('/img/cms_logov2.png') }}"/>
    <ul class="cmsMenu cM_main">
        <li class="cmName">
            <p>Algemeen</p>
        </li>
        <li>
            <a href="{{ route('cms_home') }}">Home</a>
        </li>
    </ul>
    <ul class="cmsMenu cM_components">
        <li class="cmName">
            <p>Components</p>
        </li>
        <li>
            {{--<a href="{{ route('nieuw_voertuig')}}">Occasions</a>--}}
            <a href="{{ route('alle_voertuigen') }}">Occasions</a>
        </li>
        <li>
            <a href="{{ route('alle_kenmerken') }}">Kenmerken</a>
        </li>
        <li>
            <a href="{{ route('alle_formulieren') }}">Formulieren</a>
        </li>
        <li>
            <a href="{{ route('alle_pages') }}">Pagina's</a>
        </li>
    </ul>
</div>