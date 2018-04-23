<div id="eventsToday">
    <table>
    <?php
    
        $events=$dao->getToday($username);
        echo "<tr><th>Events</th></tr>";
        foreach($events as $event) {
            print   "<tr><td><h3>" . htmlspecialchars($event['title']) . "</h3><br/>" .
                    "  " . htmlspecialchars($event['completionDate']) . "<br/>" .
                    "  " . htmlspecialchars($event['description']) . "</td></tr>";
        }
    
    ?>
</div>