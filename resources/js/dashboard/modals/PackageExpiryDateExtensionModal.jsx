import Modal from "../components/Modal";
import { useGlobalContext } from "../context";

export default function PackageExpiryDateExtensionModal() {
    const { setShowPackageExtensionModal } = useGlobalContext();

    return (
        <Modal>
            <div className="rounded-md bg-white px-4 py-4 space-y-4">
                <h2 className="mb-3 text-lg font-bold">
                    Prolongement de bouquet
                </h2>
                <div className="space-y-2">
                    <label htmlFor="prolongement" className="m-0 block">
                        Veuillez entrer la date de fin du bouquet.
                    </label>
                    <input
                        type="datetime-local"
                        name="prolongement"
                        id="prolongement"
                        className="rounded-md border-2 border-gray-300 px-2 py-2 focus:border-gray-400"
                        style={{ width: "100%" }}
                    />
                    <p className="text-xs font-bold">
                        NB: Le prolongement maximale est de 1 an.
                    </p>
                </div>
                <div className="space-x-4">
                    <button className="modal-button">
                        Enregistrer
                    </button>
                    <button
                        className="modal-button"
                        onClick={() => {
                            setShowPackageExtensionModal(false);
                        }}
                    >
                        Annuler
                    </button>
                </div>
            </div>
        </Modal>
    );
}
