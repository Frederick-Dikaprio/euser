import { useGlobalContext } from "./context";
import UserTab from "./tabs/UserTab";
import PackageTab from "./tabs/PackageTab";
import GuardianTab from "./tabs/GuardianTab";
import GodfatherTab from "./tabs/GodfatherTab";
import UserInfoModal from "./modals/UserInfoModal";
import ActionButton from "./components/ActionButton";
import NavigationBar from "./components/NavigationBar";
import UserProfileModal from "./modals/UserProfileModal";
import PackageExpiryDateExtensionModal from "./modals/PackageExpiryDateExtensionModal";
import SubscriptionAssignmentModal from "./modals/SubscriptionAssignmentModal";

export default function App() {
    const {
        selectedTab,
        setSelectedTab,
        userToView,
        viewProfile,
        showPackageExtensionModal,
        subscriptionAssignmentModalVisibility,
    } = useGlobalContext();

    return (
        <>
            <NavigationBar />
            {selectedTab === "usager" && <UserTab />}
            {selectedTab === "parrain" && <GodfatherTab />}
            {selectedTab === "tuteur" && <GuardianTab />}
            {selectedTab === "bouquet" && <PackageTab />}
            {viewProfile && <UserProfileModal />}
            {userToView && <UserInfoModal />}
            {showPackageExtensionModal && <PackageExpiryDateExtensionModal />}
            {subscriptionAssignmentModalVisibility && (
                <SubscriptionAssignmentModal />
            )}
            {selectedTab !== "usager" && (
                <div className="mt-10 flex justify-center">
                    <ActionButton
                        name="Usager"
                        onClick={() => {
                            setSelectedTab("usager");
                        }}
                    />
                </div>
            )}
        </>
    );
}
