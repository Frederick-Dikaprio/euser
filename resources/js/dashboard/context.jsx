import React, { createContext, useContext, useState, useEffect } from "react";

const AppContext = createContext();

export function useGlobalContext() {
    return useContext(AppContext);
}

export default function AppProvider({ children }) {
    const [authenticatedUser, setAuthenticatedUser] = useState();
    const [selectedTab, setSelectedTab] = useState("usager");
    const [userToView, setUserToView] = useState();
    const [viewProfile, setViewProfile] = useState(false);
    const [showPackageExtensionModal, setShowPackageExtensionModal] =
        useState(false);
    const [subscriptionToAssign, setSubscriptionToAssign] = useState();
    const [
        subscriptionAssignmentModalVisibility,
        setSubscriptionAssignmentModalVisibility,
    ] = useState(false);

    async function getAuthenticatedUser() {
        try {
            const response = await fetch("/backend/user");
            const user = await response.json();
            setAuthenticatedUser(user);
        } catch (error) {
            setTimeout(() => {
                getAuthenticatedUser();
            }, 3000);
        }
    }

    useEffect(() => {
        getAuthenticatedUser();
    }, []);

    function hideUser() {
        setUserToView(null);
    }

    function showUser(userToView) {
        setUserToView(userToView);
    }

    function showProfile() {
        setViewProfile(true);
    }

    function showSubscriptionAssignmentModal(subscription) {
        setSubscriptionToAssign(subscription);
        setSubscriptionAssignmentModalVisibility(true);
    }

    function hideProfile() {
        setViewProfile(false);
    }

    return (
        <AppContext.Provider
            value={{
                authenticatedUser,
                selectedTab,
                setSelectedTab,
                userToView,
                showUser,
                viewProfile,
                showProfile,
                hideProfile,
                hideUser,
                showPackageExtensionModal,
                setShowPackageExtensionModal,
                subscriptionAssignmentModalVisibility,
                setSubscriptionAssignmentModalVisibility,
                showSubscriptionAssignmentModal,
                subscriptionToAssign,
                setSubscriptionToAssign,
            }}
        >
            {children}
        </AppContext.Provider>
    );
}
