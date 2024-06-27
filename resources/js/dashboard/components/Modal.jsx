import { useGlobalContext } from "../context";

export default function Modal({ children }) {
    const { hideUser } = useGlobalContext();

    return (
        <div
            id="modal"
            className="absolute top-0 left-0 z-[3000] flex h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-neutral-700/40 outline-none"
            onClick={(e) => {
                e.target.id === "modal" && hideUser();
            }}
        >
            {children}
        </div>
    );
}
