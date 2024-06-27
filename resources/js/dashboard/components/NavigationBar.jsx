import { useGlobalContext } from "../context";
import ActionButton from "../components/ActionButton";

export default function NavigationBar() {
    const {
        selectedTab,
        setSelectedTab,
        showProfile,
        setShowPackageExtensionModal,
    } = useGlobalContext();

    return (
        <nav className="mb-10 flex justify-center gap-x-4">
            <ActionButton
                name="Info"
                onClick={() => {
                    showProfile();
                }}
            />
            {selectedTab !== "bouquet" && (
                <ActionButton
                    name="Parrain"
                    onClick={() => {
                        setSelectedTab("parrain");
                    }}
                />
            )}
            <ActionButton
                name="Tuteur"
                onClick={() => {
                    setSelectedTab("tuteur");
                }}
            />
            <ActionButton
                name="Bouquet"
                onClick={() => {
                    setSelectedTab("bouquet");
                }}
            />
            {selectedTab === "bouquet" && (
                <ActionButton
                    name="Prolongement"
                    onClick={() => {
                        setShowPackageExtensionModal(true);
                    }}
                />
            )}
        </nav>
    );
}
