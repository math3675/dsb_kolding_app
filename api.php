<?php
function get_dsb_api(){
    $id = getenv('DSB_API_ID');
    $url = "http://xmlopen.rejseplanen.dk/bin/rest.exe/departureBoard?id=008600083&rttime&format=json&useBus=0&useMetro=0"; // path to your JSON file
    $data = file_get_contents($url); // put the contents of the file into a variable
    $decode = json_decode($data); // decode the JSON feed

    $departures = $decode->DepartureBoard->Departure;

    foreach ($departures as $departure) {
        if ($departure->rtTime === null){
            $output = "<div class='board'>
            <element>
                <img class='icon' src='./assets/icons/train.svg' alt='train-icon'/>
                <span class='text'>$departure->name</span>
            </element>
            <element>
                <img class='icon' src='./assets/icons/building.svg' alt='train-icon'/>
                <span class='text'>$departure->direction</span>
            </element>
            <element>
                <img class='icon' src='./assets/icons/swap.svg' alt='train-icon'/>
                <span class='text'>Spor $departure->rtTrack</span>
            </element>
            <element>
                <img class='icon' src='./assets/icons/date.svg' alt='train-icon'/>
                <span class='text'>$departure->date</span>
            </element>
            <element>
                <img class='icon' src='./assets/icons/timer.svg' alt='train-icon'/>
                <span class='text'>$departure->time</span>
            </element>
            </div>";
        echo $output;
        } else {
        $output = "<div class='board'>
            <element>
                <img class='icon' src='./assets/icons/train.svg' alt='train-icon'/>
                <span class='text'>$departure->name</span>
            </element>
            <element>
                <img class='icon' src='./assets/icons/building.svg' alt='train-icon'/>
                <span class='text'>$departure->direction</span>
            </element>
            <element>
                <img class='icon' src='./assets/icons/swap.svg' alt='train-icon'/>
                <span class='text'>Spor $departure->rtTrack</span>
            </element>
            <element>
                <img class='icon' src='./assets/icons/date.svg' alt='train-icon'/>
                <span class='text'>$departure->date</span>
            </element>
            <element>
                <img class='icon' src='./assets/icons/timer.svg' alt='train-icon'/>
                <span class='text updatetime'><time style='text-decoration: line-through'>$departure->time</time><br><realtime style='color: black; font-weight: 400;'>$departure->rtTime</realtime></span>
            </element>
            </div>";
        echo $output;
        }
    }
}


