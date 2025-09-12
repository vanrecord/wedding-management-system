@extends('layouts.app')

@section('title', "Guest's Name")

@section('stylesheet')
<style>
  :root {
      --bg: #0f172a;
      --card: #111827;
      --muted: #9ca3af;
      --text: #e5e7eb;
      --accent: #22c55e;
      --accent-2: #60a5fa;
      --ring: rgba(96, 165, 250, 0.4);
  }

  .card {
      width: 100%;
      max-width: 520px;
      background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02));
      border: 1px solid rgba(255,255,255,0.08);
      backdrop-filter: blur(6px);
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.4);
      overflow: hidden;
      margin: 2rem auto;
  }

  .header {
      padding: 20px 22px;
      display: flex;
      align-items: center;
      gap: 12px;
      border-bottom: 1px solid rgba(255,255,255,0.06);
      background: linear-gradient(90deg, rgba(96,165,250,0.15), rgba(34,197,94,0.15));
  }

  .header h1 {
      font-size: 1.1rem;
      margin: 0;
      letter-spacing: 0.2px;
  }

  form {
      padding: 22px;
      display: grid;
      gap: 16px;
  }

  label {
      display: block;
      font-size: 0.9rem;
      /* color: var(--muted); */
      margin-bottom: 6px;
  }

  input[type="text"]{
      width: 93%;
      padding: 12px 14px;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,0.12);
      background: rgba(17,24,39,0.6);
      color: var(--text);
      outline: none;
      transition: box-shadow 0.2s, border-color 0.2s, transform 0.02s ease-in-out;
  }

  input:focus {
      border-color: var(--accent-2);
      box-shadow: 0 0 0 4px var(--ring);
  }

  .actions {
      margin-top: 8px;
      display: flex;
      gap: 12px;
      justify-content: flex-end;
  }

  button, .btn-link {
      appearance: none;
      border: none;
      padding: 12px 16px;
      border-radius: 12px;
      cursor: pointer;
      font-weight: 600;
      transition: transform 0.06s ease, filter 0.2s ease;
      text-decoration: none;
      display: inline-block;
      text-align: center;
  }

  .btn-primary {
      background: linear-gradient(135deg, var(--accent-2), #3b82f6 60%);
      color: white;
  }

  .btn-secondary {
      background: rgba(255,255,255,0.08);
      color: var(--text);
      border: 1px solid rgba(255,255,255,0.14);
  }

  .btn-link {
      background: rgba(255,255,255,0.08);
      color: var(--text);
      border: 1px solid rgba(255,255,255,0.14);
  }

  button:active, .btn-link:active { 
      transform: translateY(1px) scale(0.998); 
  }
</style>
@endsection

@section('content')
<div class="card" role="region" aria-labelledby="form-title">
    <div class="header">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5"/>
      </svg>
      <h1 id="form-title">Guest's Information</h1>
    </div>

    <form action="{{ route('userinfo.store') }}" method="post">
        @csrf
      <div>
        <label for="name">Name (ឈ្មោះ)</label>
        <input id="name" name="name" type="text" required />
      </div>
      <div>
        <label for="go_with">Go With (ទៅជាមួយ)</label>
        <input id="go_with" name="go_with" type="text" />
      </div>
      <div>
        <label for="address">Address (ទីតាំង)</label>
        <input id="address" name="address" type="text" />
      </div>
      <div>
        <label for="reil">Reil (រៀល)</label>
        <input id="reil" name="reil" type="text" />
      </div>
      <div>
        <label for="usd">USD (ដុល្លា)</label>
        <input id="usd" name="usd" type="text" />
      </div>

      <div class="actions">
        <a href="{{ route('userinfo.index') }}" class="btn-link">Show All Data</a>
        <button type="reset" class="btn-secondary">Reset</button>
        <button type="submit" class="btn-primary">Submit</button>
      </div>
    </form>
</div>
@endsection
