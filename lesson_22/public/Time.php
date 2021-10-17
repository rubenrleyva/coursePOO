<?php

class Time
{

    protected $time = null;

    public function __construct($time = null)
    {
        $this->time = $time ?: time();
    }

    public function __toString()
    {
        return date('d/m/Y H:i:s', $this->time);
    }

    public function tomorrow()
    {
        return new Time($this->time + 24*60*60);
    }

    public function yesterday()
    {
        return new Time($this->time - 24*60*60);
    }
}

$today = new Time();
$today2 = new Time();

echo "<p>Hoy es {$today2}</p>";
echo "<p>Mañana será {$today->tomorrow()}</p>";
echo "<p>Pasado mañana será {$today->tomorrow()->tomorrow()}</p>";
echo "<p>Ayer fue {$today->yesterday()}</p>";