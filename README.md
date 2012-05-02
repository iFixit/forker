Forker
------

Forker presents a simple interfacing for forking in PHP.

If you need to do several tasks in parallel, this is about as simple as it
gets.

    $things = array($thing1, $thing2);
    $results = Forker::forkMe($things, function ($index, $thing) {
       // Some expensive operation
       return calculateNewThing($thing);
    });

