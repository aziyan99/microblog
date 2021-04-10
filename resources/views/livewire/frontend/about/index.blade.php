<div class="about-page">
    <h3>About {{ $settingData->name }}</h3>
    <p>
        {{ $settingData->name }} is {{ $settingData->short_desc }}
    </p>
    <h4><u>Available at</u></h4>
    <ol>
        <li>Facebook: <a href="{{ $settingData->facebook }}">{{ $settingData->facebook }}</a></li>
        <li>Youtube: <a href="{{ $settingData->youtube }}">{{ $settingData->youtube }}</a></li>
        <li>Instagram: <a href="{{ $settingData->instagram }}">{{ $settingData->instagram }}</a></li>
        <li>Phone: <a href="javascript:void(0);">{{ $settingData->phone_number }}</a></li>
        <li>Address: <a href="javascript:void(0);">{{ $settingData->address }}</a></li>
    </ol>
</div>
