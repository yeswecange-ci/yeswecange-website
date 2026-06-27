@extends('errors.layout')
@section('code', '503')
@section('title', app()->getLocale() === 'en' ? 'Be right back' : 'De retour très vite')
@section('message', app()->getLocale() === 'en'
    ? 'The site is under maintenance. Please check back shortly.'
    : 'Le site est en maintenance. Revenez dans quelques instants.')
