<?php

namespace Feature;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Message;
use App\Models\Post;
use App\Models\Question;
use App\Models\Teacher;
use App\Models\User;
use Tests\TestCase;

class ModelRelationsSampleTest extends TestCase
{
    public function test_user_and_course()
    {
        $course = Course::create();
        $user = User::create();
        $user->courses()->attach([$course->id]);
        $this->assertEquals($course->id, $user->courses[0]->id);
        $this->assertEquals($user->id, $course->users[0]->id);

        $course = Course::create();
        $user = $course->users()->create();
        $this->assertInstanceof(User::class, $user);
        $this->assertEquals($course->id, $user->courses[0]->id);
        $this->assertEquals($user->id, $course->users[0]->id);
    }

    public function test_user_and_question()
    {
        $user = User::create();
        $question = $user->questions()->create();
        $this->assertInstanceof(Question::class, $question);
        $this->assertEquals($question->id, $user->questions[0]->id);
        $this->assertEquals($user->id, $question->user->id);
    }
}
