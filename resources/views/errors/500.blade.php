@extends('errors.layout')
@section('code', '500')
@section('title', app()->getLocale() === 'en' ? 'Something went wrong' : 'Une erreur est survenue')
@section('message', app()->getLocale() === 'en'
    ? 'Our team has been notified. Please try again in a moment.'
    : "Notre équipe a été notifiée. Merci de réessayer dans un instant.")
