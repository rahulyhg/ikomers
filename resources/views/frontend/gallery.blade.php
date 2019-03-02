@extends('frontend.layout')

@section('addcss')
<style>
.gallery,
.gallery::after,
.gallery::before {
  margin: 0;
  padding: 0;
  box-sizing: inherit; 
}
.gallery {
  display: grid;
  grid-template-columns: repeat(9, 1fr);
  grid-template-rows: repeat(20, 5vw);
  grid-gap: 1.5rem; 
}

.gallery__img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block; 
}

.gallery__item--1 {
  grid-column-start: 1;
  grid-column-end: 4;
  grid-row-start: 1;
  grid-row-end: 5;

  /** Alternative Syntax **/
  /* grid-column: 1 / span 2;  */
  /* grid-row: 1 / span 2; */
}

.gallery__item--2 {
  grid-column-start: 4;
  grid-column-end: 10;
  grid-row-start: 1;
  grid-row-end: 5;

  /** Alternative Syntax **/
  /* grid-column: 3 / span 2;  */
  /* grid-row: 1 / span 2; */
}

.gallery__item--3 {
  grid-column-start: 1;
  grid-column-end: 5;
  grid-row-start: 5;
  grid-row-end: 9;

  /** Alternative Syntax **/
  /* grid-column: 5 / span 4;
  grid-row: 1 / span 5; */
}

.gallery__item--4 {
  grid-column-start: 5;
  grid-column-end: 10;
  grid-row-start: 5;
  grid-row-end: 9;

  /** Alternative Syntax **/
  /* grid-column: 1 / span 4;  */
  /* grid-row: 3 / span 3; */
}

.gallery__item--5 {
  grid-column-start: 1;
  grid-column-end: 4;
  grid-row-start: 9;
  grid-row-end: 13;

  /** Alternative Syntax **/
  /* grid-column: 1 / span 4; */
  /* grid-row: 6 / span 3; */
}

.gallery__item--6 {
  grid-column-start: 4;
  grid-column-end: 7;
  grid-row-start: 9;
  grid-row-end: 13;

  /** Alternative Syntax **/
  /* grid-column: 5 / span 4; */
  /* grid-row: 6 / span 3; */
}

.gallery__item--7 {
  grid-column-start: 7;
  grid-column-end: 10;
  grid-row-start: 9;
  grid-row-end: 13;

  /** Alternative Syntax **/
  /* grid-column: 5 / span 4; */
  /* grid-row: 6 / span 3; */
}

.gallery__item--8 {
  grid-column-start: 1;
  grid-column-end: 5;
  grid-row-start: 13;
  grid-row-end: 16;

  /** Alternative Syntax **/
  /* grid-column: 5 / span 4; */
  /* grid-row: 6 / span 3; */
}

.gallery__item--9 {
  grid-column-start: 1;
  grid-column-end: 5;
  grid-row-start: 16;
  grid-row-end: 20;

  /** Alternative Syntax **/
  /* grid-column: 5 / span 4; */
  /* grid-row: 6 / span 3; */
}

.gallery__item--10 {
  grid-column-start: 5;
  grid-column-end: 10;
  grid-row-start: 13;
  grid-row-end: 20;

  /** Alternative Syntax **/
  /* grid-column: 5 / span 4; */
  /* grid-row: 6 / span 3; */
}
</style>
@endsection

@section('content')

<div class="page-head_agile_info_w3l">
  <div class="container dottedline-bheim">
      <h3>Endless <span>Indonesia </span></h3>
      <!--/w3_short-->
      <div class="services-breadcrumb">
          <div class="agile_inner_breadcrumb">
              <ul class="w3_short">
                  <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                  <li>Endless Indonesia</li>
              </ul>
          </div>
      </div>
      <!--//w3_short-->
  </div>
</div>

<div class="container">
  <div class="gallery">
      @foreach ($galleries as $item)
        <figure class="gallery__item gallery__item--{{$loop->iteration}}">
            <img src="{{ asset($item->sliders_image) }}" alt="Gallery image 1" class="gallery__img">
        </figure>
      @endforeach
  </div>
</div>

@endsection