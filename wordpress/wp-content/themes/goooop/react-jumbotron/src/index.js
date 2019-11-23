import packageJSON from "../package.json";
import React from "react";
import ReactDOM from "react-dom";

import { MuiThemeProvider, createMuiTheme } from "@material-ui/core/styles";
import muiTheme from "./theme/mui";

import ReactJumbotron from "./components/ReactJumbotron";
import * as serviceWorker from "./serviceWorker";

console.log(
  `${packageJSON.name} ${packageJSON.version} (${process.env.REACT_APP_ENV})`
);

ReactDOM.render(
  <MuiThemeProvider theme={createMuiTheme(muiTheme)}>
    <ReactJumbotron />
  </MuiThemeProvider>,
  document.getElementById("react-jumbotron")
);

serviceWorker.register();
