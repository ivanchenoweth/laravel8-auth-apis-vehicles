'use strict';

import {
  html,
  render
} from "https://unpkg.com/htm/preact/standalone.module.js";

// New import:
import { Header } from "/js/Header.js";

function App() {

  return html`
    <${Header} title="Standalone React App">
      Web App example without node, Webpack, Babel etc.
    </${Header}>

    <div>
      <!-- Content of the page -->
    </div>
  `;
}

render(
  html`
    <${App} />
  `,
  document.getElementById("app2")
);


