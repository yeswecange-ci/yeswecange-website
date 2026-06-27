@extends('errors.layout')
@section('code', '404')
@section('title', app()->getLocale() === 'en' ? 'Page not found' : 'Page introuvable')
@section('message', app()->getLocale() === 'en'
    ? "This page doesn't exist or has moved. Let's get you back on track."
    : "Cette page n'existe pas ou a été déplacée. On vous ramène sur la bonne voie.")
