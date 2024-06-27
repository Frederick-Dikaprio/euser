/* eslint-disable no-undef */
const { defineConfig } = require("cypress");

// load the environment variables from the local .env file
require("dotenv").config({
    path: "./config/cypress/.env",
});

module.exports = defineConfig({
    e2e: {
        baseUrl: process.env.BASE_URL,
    },
});
