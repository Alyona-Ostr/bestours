<?php

namespace Src\Controllers;
use Laminas\Diactoros\Response\EmptyResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use ORM;
use Src\Enums\RequestStatus;

class AuthController
{
    public function addreview(ServerRequest $request)
    {
        $name = $request->getParsedBody()['name_review'];
        $lastname = $request->getParsedBody()['lastname_review'];
        $email = $request->getParsedBody()['email_review'];
        $rating = $request->getParsedBody()['rating_review'];
        $text = $request->getParsedBody()['review_text'];
        $date = date('Y-m-d');
        $tour_id = $request->getParsedBody()['tour_name_review'];

        $review = ORM::for_table('review')->create();

        $review->name = $name;
        $review->lastname = $lastname;
        $review->email = $email;
        $review->rating = $rating;
        $review->review = $text;
        $review->date = $date;
        $review->tour_id = $tour_id;
        $review->save();

        return new RedirectResponse('/detail/{id}');
    }
    public function booking(ServerRequest $request)
    {
        $date = $request->getParsedBody()['date_pick'];
        $name = $request->getParsedBody()['name_lastname_booking'];
        $email = $request->getParsedBody()['email_booking'];
        $phone = $request->getParsedBody()['telephone_booking'];
        $tour_id = $request->getParsedBody()['tour_name'];

        $booking = ORM::for_table('booking')->create();

        $booking->date = $date;
        $booking->name = $name;
        $booking->email = $email;
        $booking->phone = $phone;
        $booking->tour_id = $tour_id;
        $booking->save();

        return new RedirectResponse('/detail/{id}');
    }

    public function contact(ServerRequest $request)
    {
        $name = $request->getParsedBody()['name_contact'];
        $lastname = $request->getParsedBody()['lastname_contact'];
        $email = $request->getParsedBody()['email_contact'];
        $phone = $request->getParsedBody()['phone_contact'];
        $message = $request->getParsedBody()['message_contact'];

        $contact = ORM::for_table('message')->create();

        $contact->first_name = $name;
        $contact->last_name = $lastname;
        $contact->email = $email;
        $contact->phone = $phone;
        $contact->message = $message;
        $contact->save();

        return new RedirectResponse('/contact');
    }


}