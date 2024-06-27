import PackageSubscriptions from "../lists/PackageSubscriptions";

export default function PackageTab() {
    return (
        <div>
            <div className="flex gap-x-3">
                <button className="bg-indigo-700 px-3 py-1 text-white">
                    ...
                </button>
                <div className="ml-3">
                    <label>Nom de bouquet:</label>
                    <i></i>
                </div>
                <div className="ml-3">
                    <label>Langue:</label>
                    <i></i>
                </div>
            </div>
            <PackageSubscriptions />
        </div>
    );
}
