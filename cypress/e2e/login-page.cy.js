/// <reference types="Cypress" />

describe("DJED Login page", () => {
    beforeEach(() => {
        cy.visit("/");
        cy.fixture("login-credentials.json").as("credentials");
    });

    it("should log the user in", function () {
        cy.get("form").within(() => {
            // Fill in login credentials
            cy.get('input[name="alias"]').type(`${this.credentials.alias}`);
            cy.get('input[name="alias"]').should(
                "have.value",
                `${this.credentials.alias}`
            );

            cy.get('input[name="password"]').type(
                `${this.credentials.password}`
            );
            cy.get('input[name="password"]').should(
                "have.value",
                `${this.credentials.password}`
            );

            // Submit the form
            cy.root().submit();

            cy.url().should("include", "/component");
        });
    });

    it("should not log the user in", function () {
        cy.get("form").within(() => {
            // Fill in login credentials
            cy.get('input[name="alias"]').type("yvan");
            cy.get('input[name="alias"]').should("have.value", "yvan");

            cy.get('input[name="password"]').type(
                `${this.credentials.password}`
            );
            cy.get('input[name="password"]').should(
                "have.value",
                `${this.credentials.password}`
            );

            // Submit the form
            cy.root().submit();
        });
        cy.contains("Forbidden");
    });
});
