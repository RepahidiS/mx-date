# MXDate
Codeigniter - Date function language translation.

It can be used especially on servers where setlocale does not work.

This function has the same date format as the date function. Provides translation at the point where the format becomes readable.

# Example

<div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;">

<pre style="margin: 0; line-height: 125%"><span style="color: #557799"><?php</span>
  <span style="color: #008800; font-weight: bold">function</span> <span style="color: #0066BB; font-weight: bold">example</span>() {
      <span style="color: #008800; font-weight: bold">echo</span> mxdate(<span style="background-color: #fff0f0">"r"</span>, <span style="color: #007020">strtotime</span>(<span style="background-color: #fff0f0">'2017-01-04'</span>));
      <span style="color: #888888">// Output Pzt, 04 Eyl 2017 01:10:45 +0200</span>
  }
</pre>

</div>
