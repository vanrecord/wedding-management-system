<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Simple Registration Form</title>
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

    * { box-sizing: border-box; }

    body {
      margin: 0;
      min-height: 100vh;
      display: grid;
      place-items: center;
      background: radial-gradient(1200px 600px at 80% -20%, rgba(96,165,250,0.15), transparent 60%),
                  radial-gradient(1000px 500px at -10% 120%, rgba(34,197,94,0.15), transparent 60%),
                  var(--bg);
      color: var(--text);
      font: 16px/1.5 system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, "Helvetica Neue", Arial, "Apple Color Emoji", "Segoe UI Emoji";
      padding: 24px;
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
      color: var(--muted);
      margin-bottom: 6px;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="number"] {
      width: 100%;
      padding: 12px 14px;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,0.12);
      background: rgba(17,24,39,0.6);
      color: var(--text);
      outline: none;
      transition: box-shadow 0.2s, border-color 0.2s, transform 0.02s ease-in-out;
    }

    input::placeholder { color: #6b7280; }

    input:focus {
      border-color: var(--accent-2);
      box-shadow: 0 0 0 4px var(--ring);
    }

    .radio-group {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
    }

    .radio {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 10px 12px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,0.12);
      background: rgba(17,24,39,0.6);
    }

    .actions {
      margin-top: 8px;
      display: flex;
      gap: 12px;
      justify-content: flex-end;
    }

    button {
      appearance: none;
      border: none;
      padding: 12px 16px;
      border-radius: 12px;
      cursor: pointer;
      font-weight: 600;
      transition: transform 0.06s ease, filter 0.2s ease;
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

    button:active { transform: translateY(1px) scale(0.998); }

    .hint {
      font-size: 0.8rem;
      color: #9aa3b2;
    }
  </style>
</head>
<body>
  <div class="card" role="region" aria-labelledby="form-title">
    <div class="header">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5"/>
      </svg>
      <h1 id="form-title">User Information</h1>
    </div>

    <form action="{{route('userinfo.store')}}" method="post">
        @csrf
      <!-- Name (text) -->
      <div>
        <label for="name">Full Name</label>
        <input id="name" name="name" type="text" placeholder="e.g. Sovann Chhim" required />
      </div>

      <!-- Phone (number) -->
      <div>
        <label for="phone">Phone Number</label>
        <input id="phone" name="phone" type="number" placeholder="e.g. 85512345678" inputmode="numeric" min="0" step="1" required />
        <div class="hint">Digits only (no spaces or dashes).</div>
      </div>

      <!-- Email (email) -->
      <div>
        <label for="email">Email Address</label>
        <input id="email" name="email" type="email" placeholder="you@example.com" required />
      </div>

      <!-- DOB (date) -->
      <div>
        <label for="dob">Date of Birth</label>
        <input id="dob" name="dob" type="date" required />
      </div>

      <!-- Gender (radio) -->
      <fieldset>
        <legend style="font-size:0.9rem;color:var(--muted);margin-bottom:8px;">Gender</legend>
        <div class="radio-group" role="radiogroup" aria-label="Gender">
          <label class="radio"><input type="radio" name="gender" value="male" required /> Male</label>
          <label class="radio"><input type="radio" name="gender" value="female" /> Female</label>
          <label class="radio"><input type="radio" name="gender" value="other" /> Other</label>
        </div>
      </fieldset>

      <div class="actions">
        <a href="{{ route('userinfo.index') }}">
            <button type="button" class="">Show All Data</button>
        </a>
        <button type="reset" class="btn-secondary">Reset</button>
        <button type="submit" class="btn-primary">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
