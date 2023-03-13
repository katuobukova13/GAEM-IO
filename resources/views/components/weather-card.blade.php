<style>
    .card {
        border-radius: 3px;
        background-color: #fff;
        box-shadow: 1px 2px 10px rgba(0, 0, 0, .2);
    }
    .card-title {
        text-align: center;
        font-weight: 600;
        font-size: 20px;
    }
    .card-text-item, .list-group-item-text {
        font-weight: 500;
    }
    @media only screen and (max-width: 768px) {
        .card {
           margin-bottom: 10px;
        }
    }
</style>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{!! $city['city'] !!}</h5>
        <p class="card-text">
            <span class="card-text-item">Current temperature:</span>
                    {!! $city['currentTemp'] !!}°
        </p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <span class="list-group-item-text">
                3 hours ago:
            </span>
                {!! $city['threeHoursAgoTemp'] !!}°
        </li>
        <li class="list-group-item">
            <span class="list-group-item-text">
                6 hours ago:
            </span>
            {!! $city['sixHoursAgoTemp'] !!}°
        </li>
        <li class="list-group-item">
            <span class="list-group-item-text">
                9 hours ago:
            </span>
            {!! $city['nineHoursAgoTemp'] !!}°
        </li>
        <li class="list-group-item">
            <span class="list-group-item-text">
                12 hours ago:
            </span>
            {!! $city['twelveHoursAgoTemp'] !!}°
        </li>
    </ul>
</div>
