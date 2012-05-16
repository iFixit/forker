Forker
------
[![Build Status](https://secure.travis-ci.org/iFixit/forker.png?branch=master)](http://travis-ci.org/iFixit/forker)

Forker presents a simple interfacing for forking in PHP.

If you need to do several tasks in parallel and collect their results,
this is about as simple as it gets.

    $things = array($thing1, $thing2);
    $results = Forker::map($things, function ($index, $thing) {
       // Some expensive operation
       return calculateNewThing($thing);
    });

