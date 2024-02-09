@extends('layouts-fe.app')

@section('style-fe')
<style>
@import "https://unpkg.com/open-props";
img {
  width: 100%;
  display: block;
}

button {
  font: inherit;
}

.page {
  color: var(--gray-9);
  background-color: var(--gray-0);
  display: grid;
  grid-template-areas: "main";
  min-height: 100vh;
  font-family: var(--font-sans);
}
.page__main {
  grid-area: main;
}

.main {
  display: grid;
  place-content: center;
}
.main__cards {
  display: flex;
  gap: var(--size-6);
  flex-direction: column;
  padding: var(--size-4);
}
@media screen and (min-width: 48em) {
  .main__cards {
    flex-direction: row;
  }
}

.team-card {
  color: var(--gray-9);
  background-color: var(--gray-0);
  max-width: 20em;
  box-shadow: 0px 12px 19px 0px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
}
.team-card__content {
  display: grid;
  padding: var(--size-3);
}
.team-card__img-box {
  max-width: 20em;
  aspect-ratio: 1;
}
.team-card__img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  /* border-radius: 10px; */
}
.team-card__intro {
  margin-bottom: var(--size-4);
  display: grid;
  gap: var(--size-4);
}
.team-card__title {
  font-size: var(--font-size-4);
  font-weight: var(--font-weight-6);
}
.team-card__job-title {
  color: var(--gray-6);
}
.team-card__desc {
  margin-bottom: var(--size-4);
  line-height: var(--font-lineheight-3);
}
.team-card__mail {
  margin-bottom: var(--size-4);
  font-size: 0.95rem;
  font-style: italic;
}
.team-card__btn {
  margin: 0;
  margin-top: auto;
}

.primary-btn {
  transition: 180ms ease-in;
  color: var(--gray-0);
  background-color: var(--gray-9);
  border: 0;
  padding: var(--size-3);
  cursor: pointer;
}
.primary-btn:hover {
  background-color: var(--gray-7);
}
</style>
@endsection

@section('content-fe')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('fe/assets/img/page-header.jpg')}}');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Kegiatan</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li>{{ $page_title }}</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <div class="section-header">
    <span>{{ $page_title }} Voting</span>
    <h2>{{ $page_title }} Voting</h2>

  </div>

<body class="page">
  <main class="main page__main">
    <div class="main__cards">
      @foreach ($kegiatan as $item)
        <article class="team-card">
          <div class="team-card__img-box"><img class="team-card__img" src="{{ asset('kegiatan/voting.jpg') }}" alt="Close-Up Photography of Giraffe"/></div>
          <div class="team-card__content">
            <hgroup class="team-card__intro">
              <h3 class="team-card__title">{{ $item->kegiatan. ' '.$item->tahun }}</h3>
            </hgroup>
            @if (Auth::check())
              <a href="{{ route('kandidat',$item->id) }}" class="team-card__btn primary-btn" style="border-radius: 10px; text-align:center">Detail</a>
              <a href="{{ route('hasil',$item->id) }}" class="team-card__btn primary-btn mt-2" style="border-radius: 10px; text-align:center">Hasil</a>
            @else
              <a href="{{ url('login') }}" class="team-card__btn primary-btn" style="border-radius: 10px; text-align:center">Detail</a>
            @endif
          </div>
        </article>
      @endforeach
    </div>
  </main>
</body>
@endsection

@section('script-fe')

@endsection